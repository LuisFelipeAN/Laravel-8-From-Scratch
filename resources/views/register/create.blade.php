<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-50 p-6 rounded-xl border border-gray-200">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <x-form.input name="name" type="text"/>
                <x-form.input name="username" type="text"/>
                <x-form.input name="email" type="email" autocomplete="username"/>
                <x-form.input name="password" type="password" autocomplete="new-password"/>
                <x-form.button>Register</x-form.button>
            </form>
        </main>
    </section>
</x-layout>