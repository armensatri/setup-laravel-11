@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-4 mb-2">
        <div class="app-content">
          <div class="app-content-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <section class="w-full px-4 mt-8 mb-5">
        <div class="w-full">
          <form action="{{ route('menus.update', $menu->url) }}"
            method="POST">
            @method('PATCH')
            @csrf

            <div class="app-cse-border">
              <div class="gap-8 mx-auto md:flex">
                <x-input
                  label-for="name"
                  label-name="Menu..name"
                  type="text"
                  id="name"
                  name="name"
                  value-old="name"
                  :value-default="$menu->name"
                  error="name"
                  placeholder="Masukkan nama menu"
                />

                <x-input
                  label-for="sm"
                  label-name="Menu..sm"
                  type="text"
                  id="sm"
                  name="sm"
                  value-old="sm"
                  :value-default="$menu->sm"
                  error="sm"
                  placeholder="Masukkan sorting menu"
                />
              </div>

              <div class="gap-8 mx-auto md:flex">
                <x-input-textarea
                  label-for="description"
                  label-name="Menu..description"
                  id="description"
                  name="description"
                  value-old="description"
                  :value-default="$menu->description"
                  error="description"
                  placeholder="Masukkan description menu"
                />
              </div>

              <div class="mt-8">
                <x-button-edit-data
                  button-name="Update data"
                />
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
@endsection
