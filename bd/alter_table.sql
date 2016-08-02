ALTER TABLE vendas ADD CONSTRAINT `fk_status_pagamento`
  FOREIGN KEY (status_pag) REFERENCES status_pagamento (idstatus_pagamento) ON DELETE RESTRICT ON UPDATE CASCADE;