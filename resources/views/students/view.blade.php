<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-row justify-between">
                <div class="flex flex-row justify-between gap-4">

                    <select id="department-filter" class="dark:bg-gray-800">
                        <option value="">All Departments</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                        @endforeach
                    </select>

                    <button id="reset-filter" class="bg-blue-500 text-white px-4 py-2 rounded">Reset</button>

                </div>

                <div class="flex flex-row justify-between gap-4">

                    <button id="open-modal" class="bg-blue-500 text-white px-4 py-2 rounded"> Create Student </button>

                    <form id="import-form" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="dark:bg-gray-800 w-24">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Import Excel</button>
                    </form>

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <table id="students-table" class="w-full">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Programme</th>
                        </tr>
                    </thead>
                </table>


                <!-- Modal: Student Create Form -->
                <div id="student-create-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">

                    <!-- Modal Box -->
                    <div class="bg-white rounded-lg shadow-lg w-96 p-6 dark:bg-gray-800">
                        
                        <h2 class="text-lg font-semibold mb-4">Create Student</h2>

                        <form id="student-form">
                            @csrf

                            <input type="text" name="name" placeholder="Name" class="w-full border p-2 mb-3 dark:bg-gray-800"><br>

                            <input type="email" name="email" placeholder="Email" class="w-full border p-2 mb-3 dark:bg-gray-800"><br>

                            <select id="select-department" name="department_id" class="w-full border p-2 mb-3 dark:bg-gray-800">
                                <option value="">Select Department</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>

                            <select id="select-programme" name="programme_id" class="w-full border p-2 mb-3 dark:bg-gray-800">
                                <option value="">Select Programme</option>
                                @foreach($programmes as $prog)
                                    <option value="{{ $prog->id }}">{{ $prog->name }}</option>
                                @endforeach
                            </select>

                            <div class="flex justify-end gap-2">
                                <button type="button" id="close-modal" class="px-3 py-1 bg-gray-400 text-white rounded">Cancel</button>
                                <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script>
        const studentsDataUrl = "{{ route('students.data') }}";
        const studentsAddUrl = "{{ route('students.store') }}";
        const selectprogramme = "{{ route('programme.get') }}";
        const studentImport = "{{ route('students.import') }}";
    </script>

    <script src="/js/students/list.js"></script>
    <script src="/js/students/add.js"></script>
    <script src="/js/students/import.js"></script>
    <script src="/js/programme/list.js"></script>
</x-app-layout>
