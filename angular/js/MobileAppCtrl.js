app.controller("MobileAppCtrl", function($scope,$http,$element) {
$scope.pname = [];
   $http.get("js/model.json")
    .success(function(response) {$scope.names = response; $scope.pname = response; $("#select-box").find('#default').attr("selected", "selected"); });
	$scope.chiliSpicy = function() {
        console.log($scope.selection);
		$scope.pname = [];
		angular.forEach($scope.names, function(data){
		if($scope.selection == "Rs. 2000 Below"){
		  if(data.Cost < 2000){
		   console.log(data);
		  }
		  }
         else if($scope.selection == "Rs. 5001 - 10000"){
		  if(data.Cost > 5000 && data.Cost < 10000){
		   $scope.pname.push(data);
		  }
		  }
		  else if($scope.selection == "Rs. 10001 - 18000"){
		  if(data.Cost > 10000 && data.Cost < 18000){
		   $scope.pname.push(data);
		  }
		 }
		 else if($scope.selection == "Rs. 18001 - 25000"){
		  if(data.Cost > 18000 && data.Cost < 25000){
		   $scope.pname.push(data);
		  }
		 }
		 else if($scope.selection == "All"){
		   $scope.pname.push(data);
		  
		 }
		
		 
		 
});
    };
	$scope.eventCheck = function($event){
	if ($($event.target).attr('id') == 'select-box'|| $($event.target).is("option") ){
	return $scope.pname;
	}
	else{
	$scope.pname = $scope.names;
	}
	};
});