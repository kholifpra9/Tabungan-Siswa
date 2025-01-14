@props([
    'header' => '',
])

<div class="bg-white dark:bg-dark py-1 lg:py-1">
    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="text-center bg-green-500">
                    {{ $header }}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>

<script>
    // Untuk menambahkan class tambahan ke elemen th dan td jika diperlukan
    document.querySelectorAll('th').forEach(el => el.classList.add(
        "py-4", "px-3", "text-lg", "font-medium", "text-white", "lg:py-7", "lg:px-4"
    ));
    document.querySelectorAll('td').forEach(el => el.classList.add(
        "text-dark", "border-b", "border-[#E8E8E8]", "py-5", "px-2", "text-center", "text-base", "font-medium"
    ));
</script>
