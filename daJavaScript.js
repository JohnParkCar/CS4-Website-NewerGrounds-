const { Sequelize } = require('sequelize');

const sequelize = new Sequelize('database', 'username', 'password' {
    host: 'localhost',
    dialect: 'sqlite'
});

try {
    await sequelize.authenticate();
    console.log('Connected!');
} catch (error) {
    console.error('Oopsie Daisies:', error);
}

function showAlert() {
	alert("Alert from yo mama!");
}