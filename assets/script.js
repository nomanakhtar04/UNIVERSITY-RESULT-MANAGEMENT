// JavaScript code for interactivity

// Example function to display current date and time
function displayCurrentDateTime() {
    const currentDateTime = new Date().toISOString().replace('T', ' ').substring(0, 19);
    console.log('Current Date and Time (UTC):', currentDateTime);
}

// Call the function to test it
displayCurrentDateTime();