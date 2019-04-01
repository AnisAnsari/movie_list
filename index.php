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
            a {
                text-decoration: none;
                color: #000;
            }
             a:hover {
                text-decoration: none;
                color: #000;
            }
        </style>
    </head>
    <body>
        <div class="container my-3" ng-app="myApp" ng-controller="myController">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6 text-center" ng-repeat="movie in list" >
                    <a href="movie_details.php?id={{movie._id}}" id="{{movie._id}}">
                        <img src="https://image.tmdb.org/t/p/w500{{movie.posterURL}}" class="img-fluid">
                        <h5 class="mt-1">{{movie.title}}</h5>
                        <p>{{movie.releaseDate}}</p>
                    </a>
                </div>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
        <script>
            var app = angular.module('myApp', []);
            app.controller('myController',
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
				$scope.arrMovie = jsonData;
				$scope.list = $scope.arrMovie;
            })
            .error(function () {

            });
            });
        </script>
    </body>
</html>