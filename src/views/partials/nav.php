<header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <img class="h-8 w-auto"
                    src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="" />
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">home</a>
            <a href="/about" class="text-sm/6 font-semibold text-gray-900">About</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 gap-4 lg:justify-end">
            <?php if ($_SESSION['user']['email'] ?? ''): ?>
                <span class="text-sm/6 font-semibold text-gray-900"><?php echo $_SESSION['user']['email']; ?></span>
            <?php else: ?>
                <a href="/register" class="text-sm/6 font-semibold text-gray-900">Register <span
                        aria-hidden="true">&rarr;</span></a>
                <a href="/login" class="text-sm/6 font-semibold text-gray-900">Sign in <span
                        aria-hidden="true">&rarr;</span></a>
            <?php endif; ?>
            <?php if ($_SESSION['user'] ?? false): ?>
                <form action="/logout" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="text-sm/6 font-semibold text-gray-900">Logout</button>
                </form>
            <?php endif; ?>
        </div>
    </nav>
</header>