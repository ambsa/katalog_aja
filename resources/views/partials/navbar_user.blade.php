<ul class="flex space-x-4">
    <li><a href="{{ route('user.index') }}" class="text-white hover:text-gray-200">Home</a></li>
    <li>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="text-white hover:text-gray-200" style="background: none; border: none;">Logout</button>
        </form>
    </li>
</ul>
