<footer class="w-full color-fundo text-white shadow-sm mt-10 pt-10">
    <div class="w-full flex flex-col lg:flex-row items-start justify-between px-5 gap-6">
        <!-- Coluna 1 -->
        <div class="w-full lg:w-1/2 flex flex-col gap-4">
            <!-- Logo e Título -->
            <div class="flex items-center justify-start gap-3">
                <img src="{{ asset('assets/images/Flor Oficial.png') }}" alt="Logo"
                    class="w-14 h-14 rounded-full object-cover shadow" />
                <h1 class="text-lg font-extrabold text-orange-100 font-montserratb mb-0">Flor Oficial</h1>
            </div>

            <!-- Contato -->
            <div class="flex flex-col gap-3 text-sm font-montserratb">
                <div class="flex items-start gap-2">
                    <i class="fa-solid fa-location-dot mt-1"></i>
                    <span>R. Visc. de Porto Seguro, 583 - Centro, Formosa - GO, 73801-670<br> Ao lado da Dayse Presentes</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope"></i>
                    <span>contato@flor.oficial.com</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-phone-volume"></i>
                    <span>+55 61 98101-1498</span>
                </div>
            </div>
        </div>

        <!-- Coluna 2 -->
        <div class="w-full lg:w-1/2 flex flex-col md:gap-2">
            <h2 class="text-lg font-semibold">Termos & Serviços</h2>
            <div class="flex flex-col gap-2 text-sm">
                <a href="#" class="no-underline text-white hover:underline hover:text-orange-300">Comprar na Flor Oficial</a>
                <a href="#" class="no-underline text-white hover:underline hover:text-orange-300">Política de Troca</a>
                <a href="#" class="no-underline text-white hover:underline hover:text-orange-300">Termos de Uso</a>
            </div>

            <!-- Redes Sociais -->
            <div class="flex gap-4 mt-4">
                <a href="#" class="text-white hover:text-orange-300"><i class="bi bi-facebook text-2xl"></i></a>
                <a href="#" class="text-white hover:text-orange-300"><i class="bi bi-instagram text-2xl"></i></a>
                <a href="#" class="text-white hover:text-orange-300"><i class="bi bi-twitter-x text-2xl"></i></a>
            </div>
        </div>
    </div>

    <!-- Divider -->
    <hr class="my-6 border-gray-600">

    <!-- Rodapé inferior -->
    <div class="w-full px-5 pb-6 text-center text-sm text-gray-300 font-montserratb">
        <p>@2025 Flor Oficial. Todos os direitos reservados.</p>
        <p>Desenvolvido por <a href="http://www.next-level.com" target="_blank" class="underline hover:text-orange-300">FormoTech</a></p>
    </div>
</footer>
