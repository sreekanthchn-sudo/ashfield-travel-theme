#!/usr/bin/env bash
# =============================================================================
#  Ashfield Travel — One-Command SSH Deploy Script
#  Usage:  ./deploy.sh
#  Needs:  .env file with your SiteGround SSH credentials (see .env.example)
# =============================================================================

set -euo pipefail

# ── Load .env ────────────────────────────────────────────────────────────────
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
ENV_FILE="$SCRIPT_DIR/.env"

if [[ ! -f "$ENV_FILE" ]]; then
  echo "❌  .env file not found."
  echo "    Copy .env.example → .env and fill in your SiteGround details."
  exit 1
fi

# shellcheck disable=SC1090
source "$ENV_FILE"

# ── Required vars check ───────────────────────────────────────────────────────
: "${SG_USER:?  SG_USER not set in .env}"
: "${SG_HOST:?  SG_HOST not set in .env}"
: "${SG_PORT:=18765}"
: "${SG_THEME_PATH:?  SG_THEME_PATH not set in .env}"
: "${GIT_BRANCH:=main}"

# ── Banner ────────────────────────────────────────────────────────────────────
echo ""
echo "╔══════════════════════════════════════════════════╗"
echo "║       Ashfield Travel — Deploy to SiteGround     ║"
echo "╚══════════════════════════════════════════════════╝"
echo "  Host   : $SG_HOST"
echo "  Path   : $SG_THEME_PATH"
echo "  Branch : $GIT_BRANCH"
echo ""

# ── Confirm ───────────────────────────────────────────────────────────────────
read -r -p "▶  Deploy to LIVE site? (y/N) " CONFIRM
if [[ ! "$CONFIRM" =~ ^[Yy]$ ]]; then
  echo "   Cancelled."
  exit 0
fi

# ── Deploy ────────────────────────────────────────────────────────────────────
echo ""
echo "🚀  Connecting to SiteGround..."

ssh -p "$SG_PORT" "$SG_USER@$SG_HOST" bash <<REMOTE
  set -euo pipefail

  echo "📁  Navigating to theme directory..."
  cd "$SG_THEME_PATH"

  echo "🔄  Pulling latest from GitHub ($GIT_BRANCH)..."
  git pull origin "$GIT_BRANCH"

  echo "🔒  Setting file permissions..."
  find . -type f -exec chmod 644 {} \;
  find . -type d -exec chmod 755 {} \;
  chmod +x deploy.sh setup-server.sh 2>/dev/null || true

  echo "🗑️   Flushing WordPress object cache (if WP-CLI available)..."
  if command -v wp &>/dev/null; then
    wp cache flush --path="\$(dirname \$(dirname \$(dirname \$(pwd))))" --allow-root 2>/dev/null || true
    echo "    ✅  Cache flushed."
  else
    echo "    ⚠️   WP-CLI not found — skip cache flush."
  fi

  echo ""
  echo "✅  Deploy complete!"
  git log -1 --pretty=format:"    Last commit: %h — %s (%ar)"
  echo ""
REMOTE

echo ""
echo "🌐  Site is live at: https://$SG_HOST"
echo ""
