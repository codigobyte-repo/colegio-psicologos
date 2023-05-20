<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Formulario
        </h2>
    </x-slot>

    <x-container class="py-12 px-2">

        <form action="{{ route('forms.store') }}" method="POST">
            @csrf

            <x-errors title="ERRORES ENCONTRADOS ({errors})" only="name" />

            <x-card title="Formulario de opciones">

                <x-slot name="action">
                    <x-button icon="plus" primary>
                        Agregar
                    </x-button>
                </x-slot>

                {{-- INPUT CON PROPIEDADES --}}
                <div class="mb-4">
                    <x-input label="Nombre" 
                    name="name" 
                    placeholder="Ingresa un nombre" 
                    hint="Texto explicativo"
                    corner-hint="Ejemplo: Martin Aquino"
                    icon="user"
                    right-icon="pencil" />
                </div>

                {{-- INPUT CON PREFIJO --}}
                <div class="mb-4">
                    <x-input label="Sitio Web" class="pl-[4.5rem]" name="website"
                        placeholder="tu-sitio-web.com"
                        prefix="https://" />
                </div>

                {{-- INPUT CON SUBFIJO --}}
                <div class="mb-4">
                    <x-input label="Correo electrónico" name="correo"
                        placeholder="tu correo"
                        suffix="@codigobyte.com.ar" 
                        class="pr-44"/>

                </div>
            </x-card>

            {{-- INPUT CON SLOT --}}
            <div class="mt-4 mb-4">
                <x-input placeholder="contraseña" class="pl-16">
                    <x-slot name="prepend">

                        <div class="absolute inset-y-0">
                            <x-button
                            class="h-full"
                            icon="lock-closed"
                            primary
                            />
                        </div>

                    </x-slot>
                </x-input>
            </div>

            {{-- INPUT CON SLOT: OTRO EJEMPLO --}}
            <div class="mb-4">
                <x-input placeholder="contraseña">
                    <x-slot name="append">

                        <div class="absolute inset-y-0 right-0">
                            <x-button
                            class="h-full"
                            icon="lock-closed"
                            primary
                            />
                        </div>

                    </x-slot>
                </x-input>
            </div>

            {{-- TIPO PASSWORD --}}
            <div class="mb-4">
                <x-inputs.password label="Ingrese su contraseña"
                    placeholder="contraseña"/>
            </div>

            {{-- TIPO NÚMERO --}}
            <div class="mb-4">
                <x-inputs.number label="Edad"/>
            </div>

            {{-- TEXTAREA --}}
            <div class="mb-4">
                <x-textarea label="Comentario" placeholder="escriba su comentario"/>
            </div>

            {{-- SELECT NATIVO --}}
            {{-- En este caso por defecto toma el valor del array tanto como value y opción a mostrar --}}

            {{-- <div class="mb-4">
                <x-native-select label="País" --}}
                    {{-- Al agregar los dos puntos le indicamos que se trata de una variable php por ejemplo
                        en este caso el select espera una array --}}
                    {{-- :options="['Argentina', 'Perú', 'Chile', 'Colombia']"
                    placeholder="Selecciona un país"
                />
            </div> --}}

            {{-- Si queremos pasar un array con valores asociativos hay que definir que valor será para el value y que nombre tendrá el option --}}
            {{-- Vamos a hacer un ejemplo manual suponiendo que estamos pasando un array de la base de datos --}}

            {{-- <div class="mb-4">

                <x-native-select
                    label="País"
                    :options="[
                        [
                            'name' => 'Argentina', 
                            'id' => 1
                        ],

                        [
                            'name' => 'Perú',
                            'id' => 2
                        ],

                        [
                            'name' => 'Chile',
                            'id' => 3
                        ],
                        
                        [
                            'name' => 'Colombia',
                            'id' => 4,
                        ]
                    
                    ]"
                    placeholder="Selecciona un país"
                    option-label="name"
                    option-value="id"
                />

            </div> --}}

            {{-- Hasta aca es un manejo básico pero si queremos tener más control del manejo del select hacemos lo siguiente --}}
            <div class="mb-4">

                <x-native-select
                    label="País"
                    name="country"
                    placeholder="Selecciona un país"
                >
                    <option selected value="1">Argentina</option>
                    <option value="2">Perú</option>
                    <option value="3">Chile</option>
                    <option value="4">Colombia</option>

                </x-native-select>

            </div>

            {{-- SELECT AVANZADO --}}
            {{-- <div class="mb-4">

                <x-select
                    label="País"
                    :options="[
                        [
                            'name' => 'Argentina', 
                            'id' => 1,
                            'description' => 'Esto es una descripción de funcionalidad'
                        ],

                        [
                            'name' => 'Perú',
                            'id' => 2,
                            'description' => 'Esto es una descripción de funcionalidad'
                        ],

                        [
                            'name' => 'Chile',
                            'id' => 3,
                            'description' => 'Esto es una descripción de funcionalidad'
                        ],
                        
                        [
                            'name' => 'Colombia',
                            'id' => 4,
                            'description' => 'Esto es una descripción de funcionalidad'
                        ]
                    
                    ]"
                    placeholder="Selecciona un país"
                    option-label="name"
                    option-value="id"
                />

            </div> --}}

            {{-- Más funcionalidades del select avanzado --}}
            <div class="mb-4">

                <x-select
                    label="País"
                    name="paises"
                    placeholder="Selecciona un país"
                >

                    <x-select.option value="1">Argentina</x-select.option>
                    <x-select.option value="1">Perú</x-select.option>
                    <x-select.option value="1">Chile</x-select.option>
                    <x-select.option value="1">Colombia</x-select.option>

                </x-select>

            </div>

            {{-- Más funcionalidades del select avanzado - USUARIOS --}}
            {{-- <div class="mb-4">

                <x-select
                    label="Usuarios"
                    placeholder="Selecciona un usaurio"
                >

                    <x-select.user-option value="1" label="Martin Aquino" src="https://via.placeholder.com/500" />
                    <x-select.user-option value="2" label="Marina Rusi" src="https://via.placeholder.com/500" />
                    <x-select.user-option value="3" label="Leando Meso" src="https://via.placeholder.com/500" />
                    <x-select.user-option value="4" label="Carolina Paplona" src="https://via.placeholder.com/500" />

                </x-select>

            </div> --}}

            {{-- Conectando por AJAX con la API ver archivo en routes api.php --}}
            <div class="mb-4">

                <x-select

                    {{-- IMPORTANTE --}}
                    {{-- para enviar los datos de este select estando la opción multiselect activada
                        los valores deben ser enviados en un array de la siguiente manera --}}
                    name="users[]"

                    label="Usuarios"
                    placeholder="Selecciona un usaurio"

                    {{-- Sincronizamos con la API --}}
                    :async-data="route('api.users.index')"
                    
                    {{-- Seleccionamos los campos a mostrar --}}
                    option-label="name"
                    option-value="id"

                    {{-- Si queremos agregar el multiselect --}}
                    multiselect

                    {{-- De esta forma mostramos la imagen del usuario --}}
                    :template="[
                        /* le indicamos que use el componente user option */
                        'name' => 'user-option',
                        'config' => [
                            'src' =>'profile_photo_url',
                        ]
                    ]"

                />

            </div>
            

            <x-card>

                <div class="mb-4">

                    <x-color-picker label="Color" placeholder="Selecciona un color" 
                    :colors="[
                        ['name' => 'white', 'value' => '#fff'],
                        ['name' => 'gray', 'value' => '#fdfdfd'],
                        ['name' => 'black', 'value' => '#000'],
                        ['name' => 'Indigo', 'value' => '#6366f1'],
                        ['name' => 'Sky', 'value' => '#38bdf8'],
                    ]"
                    />

                </div>


                <div class="mb-4">
                    <x-toggle label="Estado" name="estado" value="1"/>
                </div>


                <div class="mb-4">
                    <x-checkbox id="left-label-1" left-label="Permiso 1" name="check[]" value="1" />
                    <x-checkbox id="left-label-2" left-label="Permiso 2" name="check[]" value="2" />
                    <x-checkbox id="left-label-3" left-label="Permiso 3" name="check[]" value="3" />
                    <x-checkbox id="left-label-4" left-label="Permiso 4" name="check[]" value="4" />
                    <x-checkbox id="left-label-5" left-label="Permiso 5" name="check[]" value="5" />
                </div>

                <div class="mb-4 flex space-x-4">
                    <x-radio id="left-label-1" name="sexo[]" value="1" left-label="Hombre" />
                    <x-radio id="left-label-2" name="sexo[]" value="2" left-label="Mujer" />
                </div>


                <x-slot name="footer">
                    <x-button type="submit"
                    icon="home"
                    primary
                    >
                    Guardar
                    </x-button>
                </x-slot>

            </x-card>



        </form>

    </x-container>


</x-app-layout>