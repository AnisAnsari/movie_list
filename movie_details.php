<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>Movies List</title>
        <style>
            .backdropImage img {
                height: 400px;
                width: 100%;
                background-position: center;
                background-size: cover;
            }
            .moivePoster {
                position: relative;
                top: -150px;
            }
        </style>
    </head>
    <body>
        <div class="" ng-app="myApp" ng-controller="myControllers" >
            <div class="" ng-repeat="movie in list">
                <div class="backdropImage">
                    <img src="https://image.tmdb.org/t/p/w1280/{{movie.backdropURL}}" class="img-fluid">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-6 col-md-4 moivePoster">
                            <img src="https://image.tmdb.org/t/p/w500{{movie.posterURL}}" class="img-fluid">
                        </div>
                        <div class="col-lg-9 col-6 col-md-8">
                            <h4>{{movie.title}}</h4>
                            <p>{{movie.releaseDate}}</p>
                            <!--<p>{{2-4}}</p>-->
                        </div>
                    </div>

                    <div class="row mb-3">
                        <p>
                            {{movie.plot}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
        <script>
            var app = angular.module('myApp', []);
            app.controller('myControllers',
            function ($scope, $http) {

            var request = {
            method: 'get',
            url: 'https://backend-ygzsyibiue.now.sh/api/v1/movies/',
            dataType: 'json',
            contentType: "application/json"
            };

            $scope.arrMovie = new Array;

            $http(request)
            .success(function (jsonData) {
				if(jsonData){
					$.each(jsonData, function(i, item){
						if(item._id == '<?php echo $_GET['id']; ?>'){
							$scope.arrMovie[0] = item;
							$scope.list = $scope.arrMovie;
							//console.log(item);
						}
					})
				}
				//console.log(jsonData);
				//$scope.arrMovie = jsonData;
				//$scope.list = $scope.arrMovie;
            })
            .error(function () {

            });
            });
        </script>
    </body>
</html>