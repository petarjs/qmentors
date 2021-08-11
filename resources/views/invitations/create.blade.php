<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invitations') }}
        </h2>
    </x-slot>

    @if($errors->any())
        @dd($errors)
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto">
                        <!-- Primary column -->
                        <section aria-labelledby="primary-heading"
                                 class="min-w-0 flex-1 h-full flex flex-col overflow-hidden lg:order-last">
                            <div class="px-4 py-6 flex items-center justify-between">
                                <div class="flex space-x-3">
                                    <h1 class="font-semibold text-xl">Invite user</h1>
                                </div>

                            </div>

                            <form method="POST"
                                  action="{{route('invitations.store')}}">
                                @csrf

                                <div class="flex flex-col px-4 mb-6">
                                    <x-input type="email" name="email" label="Email" placeholder="User email"
                                             :value="$invitation->email"
                                             wrapperClass="mb-4"/>

                                    @empty($selectedRole)
                                        <x-select name="role_id" label="Role" :value="$invitation->role_id"
                                                  wrapperClass="mb-4">
                                            @foreach($roles as $role)
                                                <option @if($role->id == $invitation->role_id) selected
                                                        @endif value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </x-select>
                                    @else
                                        <input type="hidden" name="role_id" value="{{$selectedRole->id}}"/>
                                        <x-input :readonly="true" name="role_name" label="Role"
                                                 :value="$selectedRole->name"
                                                 wrapperClass="mb-4"/>
                                    @endempty

                                    <div class="text-right mt-6">
                                        <x-button icon="check">
                                            Save
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </main>
                </div>
            </div>
        </div>
</x-app-layout>
