@extends("layouts.admin")

@section("title", "Katalog")

@section("content")

<div style="text-align:center; margin-top: 40px;">
    <h1>Admin panel</h1>
    <p style="font-size: 1.2em; color: #555;">Dobrodošli na admin panel menjacnice!</p>
</div>


    <!-- Google Chart container -->
    <div id="chart_div" style="width: 100%; height: 400px;"></div>

    <!-- Učitavanje Google Charts API -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      // Učitavanje "corechart" paketa
      google.charts.load('current', {'packages':['corechart']});

      // Kada se API učita, poziva se drawChart funkcija
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        // Priprema podataka za grafikon - primer podataka
        var data = google.visualization.arrayToDataTable([
          ['Tip pitanja', 'Broj'],
          ['Tehnička podrška', 11],
          ['Prodaja', 7],
          ['Računi', 5],
          ['Ostalo', 3]
        ]);

        // Opcije grafikona
        var options = {
          title: 'Pitanja po kategorijama',
          pieHole: 0.4, // Ako želiš donut chart, možeš izostaviti ili staviti 0 za klasičan pie chart
          legend: { position: 'right', alignment: 'center' },
          chartArea: { width: '70%', height: '75%' }
        };

        // Inicijalizacija PieChart-a
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

        // Iscrtavanje grafikona
        chart.draw(data, options);
      }
    </script>

@endsection
