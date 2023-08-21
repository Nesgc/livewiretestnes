<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fase de pruebas ') }}
        </h2>
    </x-slot>
    
    <table class="min-w-full divide-y divide-gray-200">
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <div class="px-6 py-4 flex items-center">
            <x-input class="flex-1 mr-3" type="text" wire:model="search" placeholder="Buscar">
            </x-input>

            @livewire('create-post')
        </div>

        @if ($posts->count())
            
        
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            
            <thead class="d-flex flex-row bg-gray-50">
          
            <tr>
              <th scope="col" class="w-24 cursor-pointer px-6 py-4 font-medium text-gray-900"
              wire:click="order('id')">ID 
              {{--sort--}}
            @if ($sort == 'id')
              @if ($direction == 'desc')
                
              <i class="fas fa-sort-alpha-up-alt float-right"></i> 
            @else
            <i class="fas fa-sort-alpha-down-alt float-right"></i> 
            @endif

            @else
            <i class="fas fa-sort float-right"></i> 
            @endif

           </th> 
            <th scope="col" class="flex flex-row cursor-pointer px-6 py-4 font-medium text-gray-900"
              wire:click="order('title')">TITLE &nbsp
          
              {{--sort--}}
            @if ($sort == 'title')
              @if ($direction == 'desc')
                
              <i class="fas fa-sort-alpha-up-alt float-right"></i> 
            @else
            <i class="fas fa-sort-alpha-down-alt float-right"></i> 
            @endif

            @else
            <i class="fas fa-sort float-right"></i> 
            @endif

              <th scope="col" class="cursor-pointer px-6 py-4 font-medium text-gray-900"
              wire:click="order('content')">CONTENT&nbsp
              
              {{--sort--}}
            @if ($sort == 'content')
            @if ($direction == 'desc')
              
            <i class="fas fa-sort-alpha-up-alt float-right"></i> 
          @else
          <i class="fas fa-sort-alpha-down-alt float-right"></i> 
          @endif

          @else
          <i class="fas fa-sort float-right"></i> 
          @endif

            
            </th>
       
              <th scope="col" class=" px-6 py-4 font-medium text-gray-900"
              wire:click="order">Edit</th>
            </tr>
           
          </thead>
    
          <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach ($posts as $item)
                
            
            <tr class="hover:bg-gray-50">
              <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                <div class="relative h-10 w-10">
                  <img src="{{Storage::url($item->image)}}">
                  <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                </div>
                <div class="">
                  <div class=" text-grsay">{{$item->id}}</div>
                </div>
              </th>
              <td class="px-6 py-4">
                <span
                  class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                >
                  <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                  {{$item->title}}
                </span>
              </td>
              <td class="px-6 py-4">{{$item->content}}</td>
              
              <td class="px-6 py-4">
             {{--  @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                
                <a class="btn btn-green" wire:click="edit({{$item}})">
                  <i class="fas fa-edit">
                    
                  </i>
              </a>
              </td>

            </tr>
            
              </td>
              
              @endforeach
              <x-dialog-modal wire:model='openedit'>
    
                <x-slot name='title'>
                    Editar el post 
                </x-slot>
            
                <x-slot name='content'>
            
                    <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">¡Imagen cargando!</strong>
                        <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
                        
                      </div>
            
                    @if ($image)
                    <img src ="{{$image->temporaryUrl()}}">
                        @else
                        <img src="{{Storage::url($post->image)}}">
                    @endif
            
                    <div class="mb-4">
                        <x-label value="Titulo del Post"/>
                        
                            <x-input wire:model="post.title" type="text" class="w-full"/>
                    </div>
            
                    <div class="mb-4">
                        <x-label value="Contenido del Post"/>
                            <textarea wire:model="post.content" rows="6" class="form-control w-full"></textarea>
                    </div>
            
                    <div>
                        <input type="file" wire:model="image" id="{{$identificador}}">
                        <x-input-error for="image" />
                    </div>
                </x-slot> 
                
                <x-slot name='footer'>
                    <x-secondary-button wire:click="$set('openedit', false)">
                        Cancelar
                    </x-secondary-button>
            
                    <x-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                        Actualizar
                    </x-danger-button>
                </x-slot>
            
            </x-dialog-modal>
          </tbody>
        </table>
        @else
        <div class="px-6 py-4">
            No existe ningún registro coincidente
        </div>
        @endif
<div class="px-6 py-3">
  {{$posts->links()}}
</div>

      </div>
 
      
   

   
            
        </table>
    

       
        

      </div>
