<?php
// Incluir topo primeiro
include_once "topo.php";
?>

<main class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Cabeçalho -->
            <div class="text-center mb-5">
                <div class="mb-4">
                    <i class="bi bi-building display-1 text-primary"></i>
                </div>
                <h1 class="display-5 fw-bold text-gradient">Quem Somos</h1>
                <p class="lead text-muted">Conheça mais sobre nossa missão e tecnologia</p>
            </div>

            <!-- Card de Apresentação -->
            <div class="card card-like shadow-lg border-0 mb-5">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="h3 fw-bold mb-3">Sistema de Gestão</h2>
                            <p class="mb-4">
                                Desenvolvido como uma solução <strong>simples e eficiente</strong> para controle de clientes e produtos, 
                                nosso sistema tem o objetivo de facilitar a administração das informações essenciais de pequenos negócios.
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-primary">Interface Amigável</span>
                                <span class="badge bg-success">Design Responsivo</span>
                                <span class="badge bg-info">Tema Dinâmico</span>
                                <span class="badge bg-warning">CRUD Completo</span>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="feature-icon">
                                <i class="bi bi-graph-up-arrow display-1 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção de Tecnologias -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card card-like h-100 border-0">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="bi bi-code-slash display-4 text-primary"></i>
                            </div>
                            <h3 class="h5 fw-bold text-center mb-3">Tecnologias Utilizadas</h3>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="tech-item p-3 text-center rounded">
                                        <i class="bi bi-filetype-php display-6 text-primary mb-2"></i>
                                        <h6 class="fw-bold mb-1">PHP + MySQLi</h6>
                                        <small class="text-muted">Backend</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="tech-item p-3 text-center rounded">
                                        <i class="bi bi-bootstrap display-6 text-purple mb-2"></i>
                                        <h6 class="fw-bold mb-1">Bootstrap 5</h6>
                                        <small class="text-muted">Framework CSS</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="tech-item p-3 text-center rounded">
                                        <i class="bi bi-filetype-html display-6 text-orange mb-2"></i>
                                        <h6 class="fw-bold mb-1">HTML5 + CSS3</h6>
                                        <small class="text-muted">Frontend</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="tech-item p-3 text-center rounded">
                                        <i class="bi bi-filetype-js display-6 text-warning mb-2"></i>
                                        <h6 class="fw-bold mb-1">JavaScript</h6>
                                        <small class="text-muted">Interatividade</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-like h-100 border-0">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="bi bi-rocket-takeoff display-4 text-success"></i>
                            </div>
                            <h3 class="h5 fw-bold text-center mb-3">Funcionalidades</h3>
                            <div class="features-list">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-3"></i>
                                    <span>Cadastro completo de clientes</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-3"></i>
                                    <span>Gestão de produtos e estoque</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-3"></i>
                                    <span>Interface moderna com modals</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-3"></i>
                                    <span>Tema claro/escuro dinâmico</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-3"></i>
                                    <span>Design totalmente responsivo</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-3"></i>
                                    <span>Operações CRUD completas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção de Evolução -->
            <div class="card card-like border-0 bg-gradient-primary text-white">
                <div class="card-body p-5 text-center">
                    <i class="bi bi-arrow-repeat display-4 mb-3"></i>
                    <h3 class="h2 fw-bold mb-3">Em Constante Evolução</h3>
                    <p class="mb-4 opacity-75">
                        Este sistema está em <strong>constante aprimoramento</strong> e evolui conforme feedback dos usuários 
                        e necessidades reais de gestão. Nosso objetivo é unir praticidade, acessibilidade e experiência moderna.
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <div class="text-center">
                            <div class="h4 fw-bold mb-1">100%</div>
                            <small>Open Source</small>
                        </div>
                        <div class="text-center">
                            <div class="h4 fw-bold mb-1">CRUD</div>
                            <small>Completo</small>
                        </div>
                        <div class="text-center">
                            <div class="h4 fw-bold mb-1">Responsivo</div>
                            <small>Mobile First</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Final -->
            <div class="text-center mt-5">
                <p class="text-muted mb-3">Pronto para começar a gerenciar seus dados?</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="index.php?pg=clientes" class="btn btn-primary btn-lg">
                        <i class="bi bi-people-fill me-2"></i>Ver Clientes
                    </a>
                    <a href="index.php?pg=produtos" class="btn btn-success btn-lg">
                        <i class="bi bi-box-seam me-2"></i>Ver Produtos
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.text-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.tech-item {
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.tech-item:hover {
    transform: translateY(-2px);
    border-color: var(--primary);
    background: rgba(37, 99, 235, 0.05);
}

.features-list i {
    font-size: 1.1em;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

.feature-icon {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

/* Ajustes para tema escuro */
[data-theme="dark"] .bg-gradient-primary {
    background: linear-gradient(135deg, #4f8cff 0%, #8b5cf6 100%) !important;
}

[data-theme="dark"] .tech-item:hover {
    background: rgba(79, 140, 255, 0.1);
}
</style>

<?php
// Incluir rodapé
include_once "rodape.php";
?>