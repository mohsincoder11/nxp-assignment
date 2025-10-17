<h2>Providers</h2>

<table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: #f2f2f2;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Users</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($providers as $provider)
            <tr>
                <td>{{ $provider->id }}</td>
                <td>{{ $provider->name }}</td>
                <td>{{ $provider->email }}</td>
                <td>
                    @if ($provider->users->count() > 0)
                        <table border="1" cellpadding="5" cellspacing="0" width="100%"
                            style="border-collapse: collapse; margin-top: 5px;">
                            <thead style="background-color: #e9ecef;">
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Provider ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provider->users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->provider_id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <em>No users found</em>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<br><br>

<h2>Products</h2>

<table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: #f2f2f2;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br><br>

<h2>Orders</h2>

<table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
    <thead style="background-color: #f2f2f2;">
        <tr>
            <th>ID</th>
            <th>Total Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>${{ number_format($order->total_amount, 2) }}</td>
                <td>{{ ucfirst($order->status) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
