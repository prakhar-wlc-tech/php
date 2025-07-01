<?php require "partials/Header.php"; ?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto"
            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/login" method="POST">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" required
                        class="block w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                <div class="mt-2">
                    <input type="password" name="password" id="password" autocomplete="new-password" required
                        class="block w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm"
                        value="<?= htmlspecialchars($_POST['password'] ?? '') ?>" />
                </div>
            </div>
            <?php if (!empty($errors)): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['email'] ?? $errors['password'] ?? $errors['body'] ?? '') ?>
                </p>
            <?php endif; ?>
            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                    Sign in
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            New to our platform?
            <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign up</a>
        </p>
    </div>
</div>

<?php require 'partials/footer.php'; ?>