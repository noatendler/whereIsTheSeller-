/*
 * Required variables and functions
 */
/*
 * timer states: 0 - stopped. 1 - running.
 * will be used to run the timer in the background (NOT YET IMPLEMENTED!)
 */
var globalRemoveItemIndex, globalRemoveItem;
 var timerState = 0;
/* 
 * Updating the cart content 
 */
var updateCart = (function(){
	console.log("updateCart() invoked");
	var cartItemsArr = document.getElementsByClassName("number"),
	dropDownCartMenuContentArr = document.getElementsByClassName("dropDownCartMenuContent");
	
	return function(){
		var dropDownMenuArr = document.getElementsByClassName("dropDownCartMenu"),
		dropDownMenuShadowWrapperArr = document.getElementsByClassName("dropDownCartMenuShadowWrapper"),
		layoutCartItemsCount = cartItemsArr[0],
		tempCartItemFragement = document.createDocumentFragment(),
		dropDownCartMenuContent = dropDownCartMenuContentArr[0],
		newArticle, tempChild, tempVar, tempText, dropDownMenuShadowWrapper, dropDownMenu, dropDownCartMenuHeight,
		dropDownMenuTopButton, dropDownMenuBottomButton,
		actionCode = 0;
		
		
		
		/* set the drop-down animation for the cart items menu */
		$('.dropDownCartMenu').css("display", "none");
		
		$( '.cart' ).click(
	            function(){
	                $('.dropDownCartMenu').slideToggle(300);
	            }
	        );
	        
	    $('#topDropDownCartMenuButton').click(
	    	function(){
	    		$('.dropDownCartMenu').slideToggle(300);
	    	}
	    );
	    $('.bottomCloseButton').click(
	    	function(){
	    		$('.dropDownCartMenu').slideToggle(300);
	    	}
	    );
		
		
		//update the cart items number
		var cartItemsNumber = $('.dropDownCartMenuContentArticle').size();
		layoutCartItemsCount.innerHTML = cartItemsNumber;
		
		
		$("#cartDialogCloseButton").click(function(){
			$("#lightBoxShadowBackground").toggle();
			$("#cartDialog").toggle();
		});
		
		
		$('.removeBtn').click(function(){
			globalRemoveItem = $(this).closest('article');
			globalRemoveItemIndex = globalRemoveItem.index() + 1;
			$("#lightBoxShadowBackground").toggle();
			$("#cartDialog").toggle();
			$("#cartDialogHealine").html("הסר מוצר");
			$(".removeFromCart").show();
			$(".updateCart").hide();
			$("#cartDialogBlazerUpdateButton").hide();
			$("#cartDialogPantsUpdateButton").hide();
			$("#cartDialogRemoveButton").show();
			$itemName = $(globalRemoveItem).children("h5").html();
			$(".cartDialogItemName").html($itemName);
			$(".cartDialogItemColor").html("צבע: " + $(globalRemoveItem).children("p").children(".cartMenuItemColor").html());
			$(".cartDialogItemSize").html("מידה: " + $(globalRemoveItem).children("p").children(".cartMenuItemSize").html());
			$("#cartDialogImage").empty();
			
			$.ajax({
				type: "GET",
				url: "updateDialogView.php",
				data: {dialogItemName:$itemName},
				cache: true,
				success: function(html){
					console.log("data to updateDialogView.php was sent");
					$("#cartDialogImage").html(html);				
				}  
			});
			
			
		});
		
		$("#cartDialogCancelButton").click(function(){
			$("#lightBoxShadowBackground").toggle();
			$("#cartDialog").toggle();
		});
		
		$("#cartDialogBlazerUpdateButton").click(function(){
			var itemKind = 'blazer';
			var newSize = $("#cartDialogSelectBlazerSize").val();
			var newColor = $("#cartDialogSelectBlazerColor").val();
			var dataString = 'itemKind=' + itemKind + '&indexToRemove=' + globalRemoveItemIndex 
			+ '&size=' + newSize + '&color=' + newColor;
			
			$.ajax({
				type: "GET",
				url: "updateCartView.php",
				data: dataString,
				cache: true,
				success: function(html){
					console.log("data was sent to updateCartView.php");
				}  
			});
			$(globalRemoveItem).children("p").children(".cartMenuItemColor").html(newColor);
			$(globalRemoveItem).children("p").children(".cartMenuItemSize").html(newSize);
			$("#lightBoxShadowBackground").toggle();
			$("#cartDialog").toggle();
		});
		
		
		$("#cartDialogPantsUpdateButton").click(function(){
			var itemKind = 'pants';
			var newSize = $("#cartDialogSelectPantsSize").val();
			var newColor = $("#cartDialogSelectPantsColor").val();
			var dataString = 'itemKind=' + itemKind + '&indexToRemove=' + globalRemoveItemIndex 
			+ '&size=' + newSize + '&color=' + newColor;
			
			$.ajax({
				type: "GET",
				url: "updateCartView.php",
				data: dataString,
				cache: true,
				success: function(html){
					console.log("data to updateCartView.php was sent");
				}  
			});
			
			$(globalRemoveItem).children("p").children(".cartMenuItemColor").html(newColor);
			$(globalRemoveItem).children("p").children(".cartMenuItemSize").html(newSize);
			$("#lightBoxShadowBackground").toggle();
			$("#cartDialog").toggle();
			
		});
		
		
		$("#cartDialogRemoveButton").click(function(){
			globalRemoveItem.remove();
			layoutCartItemsCount.innerHTML -= 1;
			
			$.ajax({
				type: "GET",
				url: "alterCartView.php",
				data: {indexToRemove:globalRemoveItemIndex},
				cache: true,
				success: function(html){
					console.log("data was sent to alterCartView");
				}  
			});
			$("#lightBoxShadowBackground").toggle();
			$("#cartDialog").toggle();
		});
		
		
		$('.updateBtn').click(function(){
			globalRemoveItem = $(this).closest('article');
			globalRemoveItemIndex = globalRemoveItem.index() + 1;
			$("#lightBoxShadowBackground").toggle();
			$("#cartDialog").toggle();
			$("#cartDialogHealine").html("עדכון מוצר");
			$(".removeFromCart").hide();
			$(".updateCart").show();
			$("#cartDialogRemoveButton").hide();
			$itemName = $(globalRemoveItem).children("h5").html();
			$(".cartDialogItemName").html($itemName);
			$(".cartDialogItemColor").html("צבע: " + $(globalRemoveItem).children("p").children(".cartMenuItemColor").html());
			$(".cartDialogItemSize").html("מידה: " + $(globalRemoveItem).children("p").children(".cartMenuItemSize").html());
			$("#cartDialogImage").empty();
			
			if ($(this).hasClass("blazerCartDialog")){
				$(".cartDialogBlazerContent").show();
				$(".cartDialogPantsContent").hide();
				$("#cartDialogPantsUpdateButton").hide();
				$("#cartDialogBlazerUpdateButton").show();
			};
			if ($(this).hasClass("pantsCartDialog")){
				$(".cartDialogBlazerContent").hide();
				$(".cartDialogPantsContent").show();
				$("#cartDialogPantsUpdateButton").show();
				$("#cartDialogBlazerUpdateButton").hide();			
			};
			
			$.ajax({
				type: "GET",
				url: "updateDialogView.php",
				data: {dialogItemName:$itemName},
				cache: true,
				success: function(html){
					console.log("data to updateDialogView.php was sent");
					$("#cartDialogImage").html(html);				
				}  
			});
			
		});
		
		
		
		
	};
})();












/*
 * Setting and running the time counter (after calling the seller)
 */
var setTheTimer = (function(){
	console.log("setTheTimer() invoked");
	
	/*
	 * timerStatus (changed by clicking the timer's header) used in a later switch-case code.
	 */
	var timerStatus = 0, startTimer;
	
	
	return function(){
		var timerScreenContent = document.getElementById("timerScreen"),
		tempSetTimer = document.getElementById("tempSetTimer"),
		minutes = 0, minutesToUpdate = 0, seconds = 0, secondsToUpdate = 0;
		
		tempSetTimer.onclick = function(){
			switch (timerStatus){
				case 0:{
					clearInterval(startTimer);
					timerStatus++;
					break;
				}
				case 1:{
					timerScreenContent.innerHTML = "00:00";
					seconds = 0;
					minutes = 0;
					timerStatus++;
					timerState = 0;
					timerScreenContent.style.color = "#333333";
					break;
				}
				case 2:{
					timerStatus = 0;
					startTimer = setInterval(updateTheTimer, 1000);
					timerState = 1;
					break;
				}
				default:{
					
				}
			}
		};
		
		
		function updateTheTimer(){
			
			seconds++;
			
			if (seconds >= 60){
				seconds = 0;
				minutes ++;
			}
			
			if (seconds < 10){
				secondsToUpdate = "0" + seconds;
			}
			else{
				secondsToUpdate = seconds;
			}
			if (minutes < 10){
				minutesToUpdate = "0" + minutes;
			}
			else{
				minutesToUpdate = minutes;
			}
			
			
			timerScreenContent.innerHTML = minutesToUpdate + ":" + secondsToUpdate;
			
			if (minutes >= 4){
				timerScreenContent.style.color = "#ff0000";
			}
		}
		
		startTimer = setInterval(updateTheTimer, 1000);

	};
})();
