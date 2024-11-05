<!DOCTYPE html>
<html lang="en">
<!-- Content -->
<div class="content">
    <h1>Pengguna</h1>
    <a href="#" class="add-button">TAMBAH</a>

    <!-- Search Form -->
    <form action="{{ url('/pengguna') }}" method="GET" class="search-form" id="searchForm">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari ..." id="searchInput">
    </form>

    <!-- User Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama Pengguna</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role->nama_role }}</td>
                    <td class="action-icons">
                        <a href="/pengguna/{{ $user->id }}/edit"><i class="fas fa-edit"></i></a>
                        <a href="/pengguna/{{ $user->id }}"><i class="fas fa-eye"></i></a>
                        <a href="/pengguna/{{ $user->id }}/delete"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function debounce(func, delay) {
        let timeoutId;
        return function(...args) {
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            timeoutId = setTimeout(() => {
                func.apply(this, args);
            }, delay);
        };
    }
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');

    searchInput.addEventListener('keyup', debounce(function() {
        searchForm.submit();
    }, 500));
</script>
</body>

</html>