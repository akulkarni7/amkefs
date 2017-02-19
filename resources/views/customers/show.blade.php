@extends('app')
@section('content')
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Customer ID</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
        </table>
    </div>


    <?php
    $stockprice=null;
    $stotal = 0;
    $svalue=0;
    $itotal = 0;
    $ivalue=0;
    $iportfolio = 0;
    $cportfolio = 0;
    $cptotal = 0;
    $awinvestment = 0;
    $totalinitialportfolio = 0;
    $totalcurrentportfolio = 0;
    $mtotal = 0;
    $mftotal =0;
    $muPortfolioValue=0;

    ?>
    <br>
    <h2>Stocks </h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th> Symbol </th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
                <th>Original Value</th>
                <th>Current Price</th>
                <th>Current Value</th>
            </tr>
            </thead>

            <tbody>




            @foreach($customer->stocks as $stock)
                <tr>
                    <td>{{ $stock->symbol }}</td>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->shares }}</td>
                    <td>{{ $stock->purchase_price }}</td>
                    <td>{{ $stock->purchased }}</td>
                    <td><?php echo '$', $stock['shares']*$stock['purchase_price'];
                        $stotal=$stotal+$stock['shares']*$stock['purchase_price']?></td>
                    <?php   $URL = "http://www.google.com/finance/info?q=NSE:" . $stock['symbol'];
                    $file = fopen("$URL", "r");
                    $r = "";
                    do {
                        $data = fread($file, 500);
                        $r .= $data;
                    } while (strlen($data) != 0);
                    //Remove CR's from ouput - make it one line
                    $json = str_replace("\n", "", $r);

                    //Remove //, [ and ] to build qualified string
                    $data = substr($json, 4, strlen($json) - 5);

                    //decode JSON data
                    $json_output = json_decode($data, true);
                    //echo $sstring, "<br>   ";
                    $price = "\n" . $json_output['l'];
                    ?>
                    <td><?php echo '$', $price ?></td>
                    <td><?php echo '$', $stock['shares']*$price;
                        $cptotal=$cptotal+$stock['shares']*$price?></td>

                </tr>

            @endforeach

            </tbody>
        </table>
        <p>Total of Initial Stock Portfolio <?php echo number_format ($stotal, 2)?></p>
        <p>Total of Current Stock Portfolio <?php echo number_format ($cptotal, 2)?></p>
    </div>



    <h2>Investments</h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th> Category </th>
                <th>Description</th>
                <th>Acquired Value</th>
                <th>Acquired Date</th>
                <th>Recent Value</th>
                <th>Recent Date</th>
            </tr>
            </thead>

            <tbody>




            @foreach($customer->investments as $investment)
                <tr>
                    <td>{{ $investment->category }}</td>
                    <td>{{ $investment->description }}</td>
                    <td>{{ $investment->acquired_value }}</td>
                    <td>{{ $investment->acquired_date }}</td>
                    <td>{{ $investment->recent_value }}</td>
                    <td>{{ $investment->recent_date }}</td>
                    <?php $itotal=$itotal+$investment['acquired_value'];
                    $awinvestment=$awinvestment+$investment['recent_value']?>


                </tr>

        @endforeach
            </table>
        <p>Total of Initial Investment Portfolio <?php echo number_format ($itotal, 2)?></p>
        <p>Total of Current Investment Portfolio <?php echo number_format ($awinvestment, 2)?></p>
    </div>



    <h2>Mutual Funds</h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Fund Name</th>
                <th>Fund Asset</th>
                <th>Amount</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>\
                <th> Price</th>
            </tr>
            </thead>

            <tbody>



            @foreach($customer->mutualfunds as $mutualfund)
                <tr>

                    <td>{{ $mutualfund->fund_name}}</td>
                    <td>{{ $mutualfund->fund_assets}}</td>
                    <td>{{ $mutualfund->amount}}</td>
                    <td>{{ $mutualfund->purchase_price}}</td>
                    <td>{{ $mutualfund->purchased}}</td>
                    <?php
                    $muPortfolioValue= $mutualfund->amount*$mutualfund->purchase_price;
                   /* $importfolio+=$muPortfolioValue;*/
                   $mtotal+=$muPortfolioValue;
                    ?>



                   {{-- <td>{{$price}} </td>
--}}

                    <td>{{ $muPortfolioValue}}</td>



                </tr>



            @endforeach
        </table>
        <p> Total of Initial Mutual Fund Portfolio  <?php echo number_format( $mtotal,2)?></p>


    </div>

    <h2>Summary of Portfolio</h2>
    <?php $totalinitialportfolio=$stotal+$itotal+$mtotal?>
    <?php $totalcurrentportfolio=$cptotal+$awinvestment?>
    <p>Total of Initial Portfolio Value <?php echo number_format ($totalinitialportfolio, 2)?></p>
    <p>Total of Current Investment Portfolio <?php echo number_format ($totalcurrentportfolio, 2)?></p>
@stop
