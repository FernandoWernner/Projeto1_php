// theme.js — toggle theme and persist in localStorage
(function(){
  const darkLinkId = 'theme-dark';
  const toggleId = 'theme-toggle';

  function setTheme(theme) {
    try {
        const darkLink = document.getElementById(darkLinkId);
        if (darkLink) {
            darkLink.disabled = (theme !== 'dark');
        }
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('site-theme', theme);
        updateToggle(theme);
        
        // Forçar atualização dos modals abertos
        const modalsAbertos = document.querySelectorAll('.modal.show');
        modalsAbertos.forEach(modal => {
            // Disparar um redesenho forçado
            const modalContent = modal.querySelector('.modal-content');
            if (modalContent) {
                modalContent.style.display = 'none';
                setTimeout(() => {
                    modalContent.style.display = 'block';
                }, 10);
            }
        });
        
    } catch(e){ 
        console.warn('Erro ao alterar tema:', e); 
    }
}

  window.toggleTheme = function() {
    const current = document.documentElement.getAttribute('data-theme') || 'light';
    const newTheme = current === 'dark' ? 'light' : 'dark';
    setTheme(newTheme);
  };

  // Inicializar tema quando a página carregar
  document.addEventListener('DOMContentLoaded', function(){
    const saved = localStorage.getItem('site-theme');
    const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    const initialTheme = saved || (systemPrefersDark ? 'dark' : 'light');
    
    setTheme(initialTheme);
  });
})();