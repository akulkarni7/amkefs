@extends('app')
@section('content')
    <h1>Mutual Fund </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Fund Name</td>
                <td><?php echo ($mutualfund['fund_name']); ?></td>
            </tr>
            <tr>
                <td>Fund Asset</td>
                <td><?php echo ($mutualfund['fund_assets']); ?></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><?php echo ($mutualfund['amount']); ?></td>
            </tr>
            <tr>
                <td>Purchase Price </td>
                <td><?php echo ($mutualfund['purchase_price']); ?></td>
            </tr>
            <tr>
                <td>Date Purchased</td>
                <td><?php echo ($mutualfund['purchased']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
