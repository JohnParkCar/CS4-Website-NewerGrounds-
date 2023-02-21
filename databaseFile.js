const { Sequelize, DataTypes} = require('sequelize');
const sequelize = new Sequelize('sqlite::memory');

const User = sequelize.define('User', {
//Attributes are here. Username can be null unless defined.
    userName: {
        type: dataTypes.STRING
    },
    passWord: {
        type: dataTypes.STRING,
        allowNull: false
    },
});

console.log(User === sequelize.models.User):
