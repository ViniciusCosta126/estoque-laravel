<aside class="bg-gray-dark text-white w-64 min-h-screen p-4">
    <nav>
        <ul class="space-y-2">
            <li class="menu-suspenso">
                <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                    <div class="flex items-center">
                        <i class="fas fa-file-alt mr-2"></i>
                        <span>Estoque</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
                <ul class="suspenso ml-4 hidden">
                    <li>
                        <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                            Ver estoque
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                            Adicionar produto
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">Pedido de peça</a>
            </li>
        </ul>
    </nav>
</aside>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const opcaoComMenuSuspenso = document.querySelectorAll(".menu-suspenso");
        opcaoComMenuSuspenso.forEach(function(opcao) {
            opcao.addEventListener("click", function() {
                const suspenso = opcao.querySelector(".suspenso");
                suspenso.classList.toggle("hidden");
            });
        });
    });
</script>
