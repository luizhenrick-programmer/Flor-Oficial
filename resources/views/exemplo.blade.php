<li x-data="{ open: false }">
    <a @click="open = !open" class="cursor-pointer flex items-center justify-between w-full text-gray-300 px-3 py-2">
        <span>E-commerce</span>
        <i :class="open ? 'rotate-90' : ''" class="transition-transform fa-solid fa-chevron-right"></i>
    </a>
    <ul x-show="open" class="transition-opacity duration-300 opacity-0" x-transition.opacity>
        <li><a href="#" class="block px-4 py-2 text-gray-200">Opção 1</a></li>
        <li><a href="#" class="block px-4 py-2 text-gray-200">Opção 2</a></li>
    </ul>
</li>
