$(document).ready(function() {
    // Loop through each category
    $('.flex-wrap .rounded').each(function(index) {
      var categoryContainer = $(this);
      var maxCount = parseInt(categoryContainer.find('#countValue').attr('data-max'));
  
      // Use setInterval to increment the count for each category
      var count = 1;
      var intervalId = setInterval(function() {
        if (count <= maxCount) {
          categoryContainer.find('#countValue').text(count);
          count++;
        } else {
          clearInterval(intervalId);
        }
      }, 100); // Adjust the interval duration as needed
    });
  });
  
  /*
  $(document).ready(function() { ... });: This jQuery function ensures that the script runs after the DOM (Document Object Model) is fully loaded.

$('.flex-wrap .rounded').each(function(index) { ... });: This jQuery selector targets all elements with the class rounded that are descendants of an element with the class flex-wrap. The .each() function iterates over each matched element.

var categoryContainer = $(this);: Inside the loop, this refers to the current category container. We wrap it with $() to convert it into a jQuery object and store it in the variable categoryContainer for easier manipulation.

var maxCount = parseInt(categoryContainer.find('#countValue').attr('data-max'));: This line extracts the maximum count (data-max) attribute from the #countValue element within the current category container. parseInt is used to convert the string value to an integer.

var count = 1;: Initialize a variable count to keep track of the current count.

var intervalId = setInterval(function() { ... }, 100);: This sets up an interval function that increments the count at regular intervals. The interval function is defined inside, and the duration is set to 100 milliseconds (adjustable based on your preference).

if (count <= maxCount) { ... }: Inside the interval function, it checks if the current count is less than or equal to the maximum count.

categoryContainer.find('#countValue').text(count);: If the condition is true, it updates the text content of the #countValue element with the current count.

count++;: Increments the count for the next iteration.

clearInterval(intervalId);: If the count exceeds the maximum count, it clears the interval to stop further increments.
  */