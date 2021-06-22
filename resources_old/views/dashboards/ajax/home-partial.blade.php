
@foreach($product_types as $product_type)

<div class="col-md-12">

<hr>

<div class="x_panel tile fixed_height_220 overflow_hidden">

            <div class="x_title">

               <a class="get" href="{{route('home')}}" style="color: gray">

               <h2> {{ $product_type->name.' '.App\Global_var::getLangString('Price_Monitor', $language_strings) }}</h2></a>

            

              <div class="clearfix"></div>

            </div>

            <div class="x_content">

        <canvas id="{{$product_type->id}}_Product_Price_Monitor-chart" width="800" height="200"></canvas>

      </div>

    </div>

    </div>



<script type="text/javascript">



    var labels = new Array();

    var itemLabels = new Array();

    var totalProduct = new Array();

    

    <?php foreach($rounds as $round){ ?>

        itemLabels.push("<?php echo $round->name.' Average Price in Birr'; ?>");

    <?php 

      $productRoundPrice=0;

      	 foreach($locations as $location){ 

          $productRoundPrice+=\App\location_product_price::productLocationPrice($product_type->id, $location->id, $round->id);

        }

      

    ?>



        totalProduct.push(<?php echo round($productRoundPrice/count($locations), 2); ?>)

    <?php } ?>



new Chart(document.getElementById("{{$product_type->id}}_Product_Price_Monitor-chart"), {

    type: 'bar',//'doughnut',

    data: {

      labels: itemLabels,//["Africa", "Asia", "Europe", "Latin America", "North America"],

      datasets: [

        {

          label: "{{ App\Global_var::getLangString($product_type->name, $language_strings) }}",

          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],

          data: totalProduct//[2478,5267,734,784,433]

        }

      ]

    },

    options: {

      legend: { display: true },

      title: {

        display: true,

        text: "{{ $product_type->name.' '.App\Global_var::getLangString('Price_Monitor', $language_strings) }} Chart"

      }

    }

});



</script>

    

@endforeach
