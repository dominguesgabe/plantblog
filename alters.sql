CREATE DATABASE plant_blog

CREATE TABLE users(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    birth_date DATE
)

CREATE TABLE posts (
    id INT auto_increment NOT NULL,
    image_url varchar(255) NOT NULL,
    reading_time int NOT NULL,
    title varchar(100) NOT NULL,
    description varchar(255) NOT NULL,
    post LONGTEXT NOT NULL,
    user_id int NOT NULL,
    created_at DATE DEFAULT current_timestamp() NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)

INSERT INTO posts (image_url, reading_time, title, description, post, user_id)
VALUES
    ('https://images.unsplash.com/photo-1621447504864-d8686e12698c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1069&q=80', 8, 'Dicas para Plantar em Casa', 'Descubra algumas dicas valiosas para cultivar plantas em casa', 'Se você está interessado em cultivar plantas em casa, aqui estão algumas dicas úteis para você começar:\n\n1. Escolha plantas adequadas para ambientes internos.\n2. Certifique-se de que as plantas recebam luz adequada.\n3. Não se esqueça de regar as plantas regularmente.\n4. Fornecer fertilizante adequado para o crescimento saudável das plantas.\n\nExperimente essas dicas e veja suas plantas florescerem em casa!', 1),
    ('https://images.unsplash.com/photo-1610348725531-843dff563e2c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80', 12, 'Crie um Jardim Vertical em sua Varanda', 'Transforme sua varanda em um espaço verde com um jardim vertical', 'Se você tem uma varanda pequena e quer aproveitar ao máximo o espaço disponível, considerar a criação de um jardim vertical pode ser uma ótima opção.\n\n1. Escolha plantas que se adaptam bem a esse tipo de cultivo.\n2. Utilize treliças, suportes ou prateleiras para acomodar as plantas.\n3. Regue regularmente e monitore o crescimento das plantas.\n4. Aproveite o visual verde e relaxante que o jardim vertical trará para sua varanda.\n\nTransforme sua varanda em um refúgio verde com um jardim vertical!', 1),
    ('https://plus.unsplash.com/premium_photo-1663852297801-d277b7af6594?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80', 15, 'Como Cultivar Ervas Medicinais', 'Aprenda a cultivar e utilizar ervas medicinais em sua própria casa', 'As ervas medicinais possuem propriedades terapêuticas e podem ser cultivadas facilmente em casa.\n\n1. Escolha ervas medicinais populares, como camomila, hortelã e alecrim.\n2. Plante as ervas em vasos ou canteiros com solo rico em nutrientes.\n3. Certifique-se de que as ervas recebam a quantidade certa de luz solar e água.\n4. Colha as ervas quando estiverem maduras e utilize-as em chás, compressas ou tinturas.\n\nCultivar ervas medicinais em casa proporciona acesso fácil a remédios naturais e saudáveis!', 1),
    ('https://plus.unsplash.com/premium_photo-1663852297801-d277b7af6594?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80', 10, 'Cuidados com Plantas Suculentas', 'Descubra como cuidar adequadamente de suas plantas suculentas', 'As plantas suculentas são conhecidas por sua capacidade de armazenar água, tornando-as ótimas opções para ambientes internos e externos.\n\n1. Plante as suculentas em solo bem drenado.\n2. Evite regar em excesso, pois o acúmulo de água pode causar apodrecimento das raízes.\n3. Forneça luz solar adequada para estimular um crescimento saudável.\n4. Fertilize as suculentas ocasionalmente, seguindo as instruções do fertilizante.\n\nCom os cuidados corretos, suas plantas suculentas irão prosperar e adicionar beleza onde quer que estejam!', 1),
    ('https://images.unsplash.com/photo-1573812331441-d99117496acb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80', 20, 'Cultivando Vegetais Orgânicos em Casa', 'Aprenda a cultivar vegetais orgânicos frescos em seu próprio quintal', 'Ter um pequeno espaço no quintal não é um obstáculo para cultivar vegetais orgânicos.\n\n1. Escolha vegetais que se adaptem bem ao clima e às condições de seu quintal.\n2. Prepare o solo adequadamente, adicionando composto orgânico e corrigindo o pH, se necessário.\n3. Plante as sementes ou mudas seguindo as instruções de plantio.\n4. Forneça água suficiente e proteja os vegetais de pragas e doenças.\n\nDesfrute de vegetais frescos e saudáveis colhidos diretamente do seu próprio quintal!', 1),
    ('https://plus.unsplash.com/premium_photo-1663852297801-d277b7af6594?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80', 8, 'Decoração com Plantas', 'Aprenda a usar plantas na decoração de interiores', 'As plantas não são apenas uma adição bonita à decoração de interiores, mas também trazem benefícios para a qualidade do ar e o bem-estar.\n\n1. Escolha plantas de interior adequadas para diferentes espaços, considerando a quantidade de luz disponível.\n2. Use vasos e suportes criativos para adicionar estilo à decoração.\n3. Agrupe plantas de diferentes alturas e formas para criar um visual interessante.\n4. Não se esqueça de regar e cuidar das plantas regularmente.\n\nTraga vida e frescor para sua casa com plantas bem escolhidas na decoração!', 1),
    ('https://images.unsplash.com/photo-1573812331441-d99117496acb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80', 15, 'Plantas Aromáticas para sua Cozinha', 'Descubra algumas plantas aromáticas que você pode cultivar em sua cozinha', 'Ter plantas aromáticas na cozinha não só adiciona beleza, mas também traz sabores e aromas frescos para suas receitas.\n\n1. Escolha plantas como manjericão, tomilho, alecrim e hortelã.\n2. Plante as ervas em vasos ou recipientes adequados.\n3. Posicione as plantas em uma área com boa luz solar e ventilação.\n4. Colha as folhas frescas quando precisar adicionar sabor às suas refeições.\n\nExplore novos sabores e enriqueça suas receitas com plantas aromáticas frescas!', 1),
    ('https://plus.unsplash.com/premium_photo-1663852297801-d277b7af6594?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80', 10, 'Benefícios das Plantas na Saúde Mental', 'Saiba como as plantas podem contribuir para a saúde mental e o bem-estar', 'Além de sua beleza estética, as plantas têm um impacto positivo na saúde mental e no bem-estar das pessoas.\n\n1. A presença de plantas pode ajudar a reduzir o estresse e a ansiedade.\n2. Cuidar das plantas oferece uma atividade relaxante e terapêutica.\n3. Plantas purificam o ar e melhoram a qualidade do ambiente.\n4. Ter plantas ao redor cria uma conexão com a natureza, promovendo uma sensação de calma e tranquilidade.\n\nDesfrute dos benefícios mentais e emocionais que as plantas podem proporcionar!', 1),
    ('https://plus.unsplash.com/premium_photo-1663852297801-d277b7af6594?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80', 12, 'Plantas que Purificam o Ar', 'Descubra algumas plantas que ajudam a purificar o ar de sua casa', 'Algumas plantas têm a capacidade de filtrar poluentes do ar, tornando-o mais limpo e saudável para respirar.\n\n1. Espada-de-São-Jorge é uma planta resistente que remove toxinas comuns, como formaldeído e benzeno.\n2. A hera inglesa é eficaz na remoção de substâncias químicas voláteis prejudiciais.\n3. O lírio da paz ajuda a remover compostos orgânicos voláteis.\n\nAlém de suas propriedades de purificação do ar, essas plantas também trazem beleza para sua casa!', 1);

ALTER TABLE users
ADD COLUMN user_resume varchar(255)
AFTER name