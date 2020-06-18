<table>
    <thead>
    <tr>
        <th> ID</th>
        <th> Book Title</th>
        <th> Author First Name </th>
        <th> Author Last Name </th>
        <th> Publishing Year</th>
        <th> Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td> {{$book->id}} </td>
            <td> {{$book->title }} </td>
            <td> {{$book->authorfirstname }} </td>
            <td> {{$book->authorlastname}} </td>
            <td> {{$book->publishyear}} </td>
            <td> {{$book->price}} </td>
        </tr>
    @endforeach
    </tbody>
</table>
