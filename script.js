var db = openDatabase("achadosperdidos", "1.0", "Banco de dados para o Sistema de Gerenciamento de Achados e Perdidos", 2 * 1024 * 1024);

db.transaction(function (tx) {
    tx.executeSql('CREATE TABLE IF NOT EXISTS achado (id INTEGER PRIMARY KEY AUTOINCREMENT, nome_achado TEXT, data_descricao TEXT, quem_achou TEXT, foto BLOB)');
    tx.executeSql('CREATE TABLE IF NOT EXISTS perdido (id INTEGER PRIMARY KEY AUTOINCREMENT, nome_perdido TEXT, data_descricao TEXT, quem_perdeu TEXT, foto BLOB)');
});


