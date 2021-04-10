<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div>
                    <table class="text-center table-auto m-4">
                        <caption class="text-2xl text-gray-500 pb-5">회원 관리</caption>
                        <thead class="border-b-2 border-red-500">
                            <tr>
                                <th class="px-10">번호</th>
                                <th class="px-10">이름</th>
                                <th class="px-10">이메일</th>
                                <th class="px-10">회원종류</th>
                                <th class="px-10">승격 및 강등 <br>(직원 / 일반유저)</th>
                            </tr>
                        </thead>
                    <tbody class="">
                    <?php  $i=0; ?>
                    @foreach ($users as $user)
                    <?php $i++; ?>
                        <tr>
                        <td class="py-5  border-b-2 border-gray-200">{{ $i }}</td>
                        <td class="py-5 border-b-2 border-gray-200">{{ $user->name }}</td>
                        <td class="py-5 border-b-2 border-gray-200">{{ $user->email }}</td>
                        <td class="py-5 border-b-2 border-gray-200">{{ $user->roles()->first()->name }}</td>
                        @if ($user->roles()->first()->id==3)
                        <td class="py-5 border-b-2 border-gray-200">
                            <form action="" method="POST">
                                @csrf
                                <input class="hidden"type="text" name="toRole" value="toAdmin">
                                <input class="hidden"type="text" name="u_email" value="{{ $user->email }}">
                                <button type="submit" class="p-1 rounded-md bg-green-200">승격</button>
                            </form>
                        </td>
                        @else
                        <td class="py-5 border-b-2 border-gray-200">
                            <form action="" method="POST">
                                @csrf
                                <input class="hidden"type="text" name="toRole" value="toUser">
                                <input class="hidden"type="text" name="u_email" value="{{ $user->email }}">
                            <button class="p-1 rounded-md bg-red-200">강등</button></td>
                        </form>
                        
                        @endif                            
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                   </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
