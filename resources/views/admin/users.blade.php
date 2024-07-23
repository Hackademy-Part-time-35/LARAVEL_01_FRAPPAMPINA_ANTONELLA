<x-layout title="{{$title}}"> 
          <div class="container mt-5">
              <h1>{{$title}}</h1>
                <div class="row mt-5">
                    <div class="col-md-3">
                        <livewire:user-form/>
                    </div>
                    <div class="col-md-9">
                        <livewire:users-list/>
                    </div>
                </div>
         </div>
</x-layout>