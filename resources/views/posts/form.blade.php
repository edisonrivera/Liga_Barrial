
<div class="mb-4">
    <div class="mb-4 md:mr-2 md:mb-0">
        <label class="block mb-2 text-sm font-bold text-gray-500">
            Título
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="title_post"
            type="text"
            placeholder="Ej. Un Nuevo Campeonato se acerca..."
            name="title_post"
            required
            maxlength="12"
        />
    </div>
</div>
<div class="mb-4">
    <label class="block mb-2 text-sm font-bold text-gray-500">
        Contenido
    </label>
    <textarea class="textarea w-full bg-white text-black" placeholder="El torneo inicia el ..." name="content_post"></textarea>
</div>

<div class="mb-4 mx-auto">
    <div class="w-full">
        <label class="label">
            <span class="block mb-2 text-sm font-bold text-gray-500">Escoge una Imagen</span>
            <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="image_post" />
        </label>
    </div>
</div>


<div class="grid mx-auto mb-6 text-center w-1/4">
    <button
        class="w-full px-4 py-2 font-bold text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline"
        type="submit"
    >
        Sube Tu Post!
    </button>
</div>
<hr class="border-t bg-white" />

<hr class="border-t bg-white mb-7" />
<div class="text-center">
    <a
        class="inline-block text-sm text-teal-600 align-baseline hover:text-teal-800"
        href="/"
    >
        Vuelve al Inicio
    </a>
</div>

