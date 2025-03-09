

<h2>Create New</h2>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="message" name="message" placeholder="message" required>

    <button type="submit">Save</button>
</form>
