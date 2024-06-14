INSERT INTO modules VALUES
(1, 'fa-solid fa-user', 'user', 'Usuários'),
(2, 'fa-solid fa-hospital', 'unit', 'Unidades'),
(3, 'fa-solid fa-id-card', 'profile', 'Perfís'),
(4, 'fa-solid fa-gears', 'module', 'Modulos'),
(5, 'fa-solid fa-person', 'people', 'Pessoas');

INSERT INTO profiles VALUES
(1, 'Administrador Geral');

INSERT INTO permissions VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

INSERT INTO users VALUES
(1, 'Pedro Paulo', '024.682.832-36', NULL, NULL, 1, '(96) 99184-9667', 'apedropaulo20@gmail.com', '$2y$10$xQFEDHKyL8xIJzKOc1XVQ.sxzyoYkaF2LhDWo5PYVYFJorOtYJSPK', 1, 1);

INSERT INTO units VALUES
(1, 'Centro de gestão de tecnologia do Amapá', 'PRODAP', '68.902-865', '13 de Setembro', '1889', 'Buritizal', 'MACAPÁ', 1);

INSERT INTO designations VALUES
(1, 1, 1);