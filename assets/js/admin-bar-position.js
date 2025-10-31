document.addEventListener('DOMContentLoaded', () => {
    const adminBar = document.getElementById('wpadminbar');

    if (!adminBar) {
        return;
    }

    const menupopElements = adminBar.querySelectorAll('.menupop');

    menupopElements.forEach((menu) => {
        const submenuWrapper = menu.querySelector('.ab-sub-wrapper');

        if (!submenuWrapper) {
            return;
        }

        menu.addEventListener('mouseenter', () => {
            submenuWrapper.style.bottom = '100%';
            submenuWrapper.style.top = 'auto';
        });

        menu.addEventListener('mouseleave', () => {
            submenuWrapper.style.bottom = '';
            submenuWrapper.style.top = '';
        });
    });

    const nestedSubmenus = adminBar.querySelectorAll('.ab-submenu .ab-submenu');

    nestedSubmenus.forEach((submenu) => {
        submenu.style.top = 'auto';
        submenu.style.bottom = '0';
        submenu.style.marginTop = '0';
        submenu.style.marginBottom = '0';
    });
});
