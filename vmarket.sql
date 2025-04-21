CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT DEFAULT NULL,
    cnpj VARCHAR(18) NOT NULL UNIQUE,
    cep VARCHAR(9) NOT NULL,
    address VARCHAR(255) NOT NULL,
    number VARCHAR(10) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT DEFAULT NULL
);

CREATE TABLE product_supplier (
    products_id INT,
    supplier_id INT,
    PRIMARY KEY(products_id, supplier_id),
    FOREIGN KEY (products_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (supplier_id) REFERENCES suppliers(id) ON DELETE CASCADE
);