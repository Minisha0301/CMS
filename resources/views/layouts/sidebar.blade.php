<div class="h-screen bg-gray-800 text-white p-4 flex flex-col justify-between">
    
    <!-- Top menu -->
    <div>
        <h2 class="text-lg font-semibold mb-4">Menu</h2>

        <a href="{{ route('dashboard') }}" class="block p-2 rounded hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('students.index') }}" class="block p-2 rounded hover:bg-gray-700 {{ request()->routeIs('students.*') ? 'bg-gray-700' : '' }}">
            Students
        </a>

        <a href="{{ route('staffs.index') }}" class="block p-2 rounded hover:bg-gray-700 {{ request()->routeIs('staffs.*') ? 'bg-gray-700' : '' }}">
            Staff
        </a>
    </div>

    <!-- Bottom user section -->
    <div class="border-t border-gray-600 pt-4">
        <div class="text-sm">
            {{ Auth::user()->name }}
        </div>
        <div class="text-xs text-gray-400">
            {{ Auth::user()->email }}
        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="my-4">
            @csrf
            <button type="submit" class="w-full text-left p-2 rounded hover:bg-gray-700">
                Logout
            </button>
        </form>
    </div>

</div>