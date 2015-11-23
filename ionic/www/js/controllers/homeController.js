angular.module('starter.controllers',[])
	.controller('HomeController', function($scope, $state, $stateParams){
	  $scope.nome = $stateParams.nome;
	  $scope.state = $state.current;
	})	