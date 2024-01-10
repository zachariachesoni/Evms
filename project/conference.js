// Wait for the DOM to be ready
document.addEventListener("DOMContentLoaded", function () {
    // Get references to the relevant HTML elements
    const locationDropdown = document.getElementById("location");
    const foodPackageDropdown = document.getElementById("package-dropdown");
    const entertainmentPackageDropdown = document.getElementById("entertainment-dropdown");
    const attendeesInput = document.getElementById("guest-dropdown");
    const selectedPackageInfo = document.getElementById("selected-package-info");
    const eventDetails = document.getElementById("event-details");
    const totalCost = document.getElementById("total-cost");
    const foodPackages = {
        50: "Delicious appetizers, main course, and dessert",
        60: "Deluxe appetizers, gourmet main course, and a variety of desserts",
        70: "Premium appetizers, gourmet main course, and a variety of desserts",
    };
   
    const entertainmentPackages = {
        500: "Basic DJ service and dance floor",
        800: "Deluxe DJ service, dance floor, and photo booth",
        1200: "Premium DJ service, live band, dance floor, and professional lighting",
    };
    
    document.getElementById("date").addEventListener("input", function () {
        updateEventDetails();
    });
    
    document.getElementById("theme").addEventListener("input", function () {
        updateEventDetails();
    });

    // Listen for changes in the location dropdown and change the background image accordingly
    locationDropdown.addEventListener("change", function () {
        const selectedLocation = locationDropdown.value;
        document.body.style.backgroundImage = getBackgroundImage(selectedLocation);
        updateEventDetails();
    });

    // Listen for changes in the food package dropdown and display the selected package details
    foodPackageDropdown.addEventListener("change", function () {
        displayPackageDetails(foodPackageDropdown.value, "food-package-info");
        updateEventDetails();
        calculateTotalCost();
    });

    // Listen for changes in the entertainment package dropdown and display the selected package details
    entertainmentPackageDropdown.addEventListener("change", function () {
        displayPackageDetails(entertainmentPackageDropdown.value, "entertainment-package-info");
        updateEventDetails();
        calculateTotalCost();
    });

    // Listen for changes in the number of attendees and calculate the total cost
    attendeesInput.addEventListener("input", function () {
        updateEventDetails();
        calculateTotalCost();
    });

    function getBackgroundImage(location) {
        // Define background images for different locations
        const backgroundImageMap = {
            indoor: "url('images/conference indoors.jpg')",
            outdoor: "url('images/conference outdoors.jpg')",
        };

        return backgroundImageMap[location] || "";
    }

    function displayPackageDetails(packageCost, infoContainerId) {
        const packageInfoContainer = document.getElementById(infoContainerId);

        // Display package cost
        packageInfoContainer.innerHTML = `<p>Cost: $${packageCost}</p>`;

        // Display package details
        let packageDetails;
        if (infoContainerId.includes("food")) {
            packageDetails = getFoodPackageDetails(packageCost);
        } else {
            packageDetails = getEntertainmentPackageDetails(packageCost);
        }

        // Display each detail as a separate paragraph
        if (packageDetails.length > 0) {
            packageInfoContainer.innerHTML += `<p>Details:</p>`;
            packageDetails.forEach(detail => {
                packageInfoContainer.innerHTML += `<p>${detail}</p>`;
            });
        }
    }

    function updateEventDetails() {
        // Display all selections and inputs at the bottom of the container
        eventDetails.innerHTML = `
            <h3>Event Details:</h3>
            <p>Event Date and Time: ${document.getElementById("date").value}</p>
            <p>Event Location: ${locationDropdown.value}</p>
            <p>Event Theme: ${document.getElementById("theme").value}</p>
            <p>Number of Attendees: ${attendeesInput.value}</p>
            <p>Food Package: ${foodPackages[foodPackageDropdown.value]}</p>
            <p>Entertainment Package: ${entertainmentPackages[entertainmentPackageDropdown.value]}</p>
        `;
    }

    function calculateTotalCost() {
        const foodPackageCost = parseInt(foodPackageDropdown.value);
        const entertainmentPackageCost = parseInt(entertainmentPackageDropdown.value);

        const totalCostValue = (foodPackageCost * parseInt(attendeesInput.value)) + entertainmentPackageCost;

        // Display the total cost at the bottom of the container
        totalCost.innerHTML = `<h3>Total Cost:</h3><p>$${totalCostValue}</p>`;
    }
   
    // Trigger initial update when the page loads
    updateEventDetails();
    calculateTotalCost();
});
