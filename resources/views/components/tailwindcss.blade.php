<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style type="text/tailwindcss">
    @layer base {

        @theme {
            --color-todo-pending: var(--color-amber-600);
            --color-todo-complete: var(--color-green-600);
        }

        *,
        ::after,
        ::before,
        ::backdrop,
        ::file-selector-button {
            border-color: var(--color-gray-300, currentColor);
        }
    }
</style>
