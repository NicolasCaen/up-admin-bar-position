document.addEventListener('DOMContentLoaded', () => {
  const html = document.documentElement;
  const select = document.getElementById('upab-position-select');
  const STORAGE_KEY = 'upAdminBarPositionSimple';

  const KL_TOP = 'admin-bar-top';
  const KL_BOTTOM = 'admin-bar-bottom';
  const KL_LEFT = 'admin-bar-left';
  const KL_RIGHT = 'admin-bar-right';
  const ALL = [KL_TOP, KL_BOTTOM, KL_LEFT, KL_RIGHT, 'up-adminbar-top', 'up-adminbar-bottom', 'up-adminbar-left', 'up-adminbar-right', 'up-adminbar-floating'];

  function apply(pos) {
    ALL.forEach(c => html.classList.remove(c));
    if (pos === 'top') html.classList.add(KL_TOP);
    if (pos === 'bottom') html.classList.add(KL_BOTTOM);
    if (pos === 'left') html.classList.add(KL_LEFT);
    if (pos === 'right') html.classList.add(KL_RIGHT);
    try { localStorage.setItem(STORAGE_KEY, pos); } catch (_) {}
  }

  const saved = (() => { try { return localStorage.getItem(STORAGE_KEY); } catch (_) { return null; } })();
  const initial = saved && ['top','bottom','left','right'].includes(saved) ? saved : 'bottom';
  apply(initial);
  if (select) {
    select.value = initial;
    select.addEventListener('change', () => apply(select.value));
  }
});
