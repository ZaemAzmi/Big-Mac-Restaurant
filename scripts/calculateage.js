function calculateAge() {
    const birthdayInput = document.getElementById('birthday');
    const ageSpan = document.getElementById('age');

    const birthday = new Date(birthdayInput.value);
    const today = new Date();

    const age = today.getFullYear() - birthday.getFullYear();
    const monthDiff = today.getMonth() - birthday.getMonth();
    const dayDiff = today.getDate() - birthday.getDate();

    if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
      age--;
    }

    return ageSpan.value = age;
  }