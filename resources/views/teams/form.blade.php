
<div class="mb-4">
    <div class="block md:ml-3">
        <label class="mb-2 text-sm font-bold text-gray-500" for="email">
            Código
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="code_soccer_team"
            type="text"
            name="code_soccer_team"
            placeholder="#LIGB1"
            maxlength="10"
            required
        />
    </div>
    <div class="md:ml-3 pb-3">
        <label class="block mb-2 text-sm font-bold text-gray-500">
            Nombre Equipo
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="name_team"
            type="text"
            placeholder="Ej. Los leones..."
            name="name_team"
            required
            maxlength="20"
        />
    </div>
    <div class="mb-4 md:flex md:justify-center">
        <select name="president_team" class="select select-info w-full max-w-xs bg-white text-black">
            <option disabled selected>Presidente de Equipo</option>
            @foreach ($presidents as $code_president_team => $user_name)
                <option value="{{ $code_president_team }}">{{ $user_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="block mb-4">
        <div class="form-control w-full">
            <label class="label">
                <span class="block mb-2 text-sm font-bold text-gray-500">Escoge tu logo</span>
                <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="logo_team"/>
            </label>
        </div>
    </div>
    <div class="flex md:ml-3">
        <label class="mb-2 text-sm font-bold text-gray-500" for="email">
            Fecha de fundación
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="fundation_date_team"
            type="date"
            name="fundation_date_team"
            required
        />
    </div>
    
    <div class="block my-4 ml-3">
        <label class="block mb-2 text-sm font-bold text-gray-500">
            Descripción
        </label>
        <textarea class="textarea w-full bg-white text-black" placeholder="Ej. El equipo se fundó bajo los principios..." name="description_team" maxlength="255" required></textarea>
    </div>
    
    <div class="mb-6 text-center mx-2">
        <button
            class="w-full px-4 py-2 font-bold text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline"
            type="submit"
        >
            Crear Equipo
        </button>
    </div>
    <hr class="border-t bg-white" />
    
    <hr class="border-t bg-white" />
    <div class="text-center mt-3">
        <a
            class="inline-block text-sm text-teal-600 align-baseline hover:text-teal-800"
            href=" {{ route('teams.index') }} "
        >
            Vuelve al Inicio
        </a>
    </div>


</div>

