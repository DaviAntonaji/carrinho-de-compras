-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql57
-- Tempo de geração: 24/03/2021 às 00:45
-- Versão do servidor: 5.7.21-log
-- Versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `carrinho`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `fabricante` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `caminho_foto` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `produto`, `fabricante`, `descricao`, `valor`, `caminho_foto`, `foto`) VALUES
(1, 'Teclado', 'HP', '. Sistema de iluminação   \r\n. Conexão USB 2.0  \r\n. Cabo de 1.8 metros  \r\n. Layout ABNT2  \r\n. 4 luzes indicadores  \r\n. Hastes para ajuste de altura   \r\n. Controle de mídia 12 teclados  \r\n. Tipo Membrana   \r\n. Teclas baixas e silenciosas   \r\n. Resistente a derramamento de líquidos   \r\n. Desing robusto', '29.99', 'imagem/02.jpg', '02.jpg'),
(2, 'Notebook', 'Acer', 'Notebook Acer Aspire 3 A315-23G-R2SE AMD Ryzen 5 - 8GB 256GB SSD 15,6” Placa Vídeo 2GB Windows 10', '2000.00', 'imagem/03.jpg', '03.jpg'),
(3, 'HD externo', 'Samsung', 'Conexões: USB 3.0  \r\nCapacidade de armazenamento:1TB  \r\nVelocidade de Transferência de Dados:480 MB/s usando USB 2.0  \r\nRequisitos do Sistema:Windows Vista Home Basic; Home Premium; Ultimate; Business Service Pack-1; Windows XP Home; Professional; Media Center Edition Service Pack-2;Porta USB 2.0  \r\nAlimentação:USB', '198.90', 'imagem/04.jpg', '04.jpg'),
(4, 'Pendrive DataTraveler Kyson', 'Kingston', 'o DataTraveler Kyson da Kingston é um pendrive Tipo A com velocidades de transferência extremamente altas de até 200MB/s para leitura e 60MB/s para gravação1, permitindo rápidas e práticas transferências de arquivo. Com até 256GB2 de armazenamento, você pode guardar e compartilhar fotos, vídeos, músicas e outros conteúdos em movimento. O modelo de metal sem tampa irá poupá-lo do problema de perder uma tampa e a prática argola torna fácil levá-lo para onde você for.\r\n\r\nO DataTraveler Kyson é uma ', '189.99', 'imagem/05.jpg', '05.jpg'),
(5, 'Head Set Gatinho', 'Ket', ' \r\n\r\nBluetooth Versão V5.0\r\n\r\nFrequência 2.40 ghz-2.48 ghz\r\n\r\nPotência = 4 dBm, Classe 2\r\n\r\nAlcance efetivo 10M\r\n\r\nSensibilidade 105db / 0.1% ber\r\n\r\nResposta de frequência 20hz-20khz\r\n\r\nTaxa de s/n 110 db\r\n\r\nDistorção 0.10%\r\n\r\nTamanho do alto falante 40mm\r\n\r\nSuporte a2dp 1.2, avrcp 1.0, hsp, hsf 1.5\r\n\r\nTensão 3.7vdc (bateria recarregável de 400 mah)\r\n\r\nFalar do tempo 8 hora\r\n\r\nTempo da música 6 hora\r\n\r\nTempo de espera 148 horas\r\n\r\nTempo de carregamento 1.2 horas\r\n\r\n20 atual mA\r\n\r\nOpere a tempera', '128.00', 'imagem/06.jpg', '06.jpg'),
(6, 'Monitor 24 polegadas', 'Dell', 'Tipo de dispositivo\r\nMonitor LCD com retroiluminação LED - 24\"\r\nTipo de Painel\r\nTN\r\nRelação de Aspecto\r\n16:9\r\nResolução Nativa\r\nFull HD (1080p) 1920 x 1080 (VGA: 60 Hz, HDMI: 75 Hz)\r\nDistância entre Pixels\r\n0.2715 mm\r\nBrilho\r\n300 cd/m²\r\nRelação de Contraste\r\n1000:1\r\nTempo de resposta\r\n5 ms (normal); 1 ms (extremo)\r\nSuporte de Cor\r\n16,7 milhões de cores\r\nConectores de Entrada\r\n2xHDMI, VGA\r\nAjustes da Posição do Visor\r\nInclinação\r\nRevestimento de Tela\r\nAnti-glare 3H hardness\r\nDimensões (LxPxA) - c', '1800.89', 'imagem/07.jpg', '07.jpg'),
(7, 'Notebook Style S51', 'Samsung', 'Memória RAM	4GB\r\nSSD	256GB\r\nModelo	Samsung Style NP730XBE-KP1BR\r\nProcessador	Intel Core i3\r\nModelo do Processador	8145U\r\nCachê	2.10 GHz até 3.90 GHz, 4 MB L3 Cache\r\nChipset	Integrado (Intel)\r\nHD	Não possui\r\nPlaca de Som	3W Estéreo (1.5W x 2) - Dolby Atmos\r\nPlaca de Vídeo	Integrada\r\nPlaca de Rede	802.11 ac 2x2\r\nPlaca Mãe	Samsung\r\nRede	802.11 ac 2x2\r\nSom	Dolby Atmos\r\nTeclado	Português-BR Retroiluminado por LED\r\nPolegadas da Tela	13.3\"\r\nSistema Operacional	Windows 10\r\nConexões	1 x USB-C 2 x USB 3.0', '4799.89', 'imagem/08.jpg', '08.jpg'),
(9, 'Mouse', 'Dell', 'Tipo de mouse: Convencional \r\nResolução do sensor: 1000 dpi  \r\nTipo de sensor: Óptico', '14.50', 'imagem/01.jpg', '01.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinhos`
--

CREATE TABLE `carrinhos` (
  `carrinho_id` int(11) NOT NULL,
  `carrinho_nome` text NOT NULL,
  `carrinho_tel` text NOT NULL,
  `carrinho_cpf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `carrinhos`
--

INSERT INTO `carrinhos` (`carrinho_id`, `carrinho_nome`, `carrinho_tel`, `carrinho_cpf`) VALUES
(15, 'Davi de Melo Antonaji', '+5518997926390', '123123123'),
(16, 'Davi de Melo Antonaji', '+5518997926390', '491.465.268-46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho_produtos`
--

CREATE TABLE `carrinho_produtos` (
  `carrinho_produto_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `carrinho_id` int(11) NOT NULL,
  `qtde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `carrinho_produtos`
--

INSERT INTO `carrinho_produtos` (`carrinho_produto_id`, `produto_id`, `carrinho_id`, `qtde`) VALUES
(12, 1, 15, 1),
(13, 2, 15, 1),
(14, 1, 16, 1),
(15, 4, 16, 2),
(16, 2, 16, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `venda_id` int(11) NOT NULL,
  `carrinho_id` int(11) NOT NULL,
  `momento` datetime NOT NULL,
  `preco_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`venda_id`, `carrinho_id`, `momento`, `preco_total`) VALUES
(3, 15, '2021-03-24 00:22:04', 2029.99),
(4, 16, '2021-03-24 00:45:26', 2409.97);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `carrinhos`
--
ALTER TABLE `carrinhos`
  ADD PRIMARY KEY (`carrinho_id`);

--
-- Índices de tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  ADD PRIMARY KEY (`carrinho_produto_id`),
  ADD KEY `carrinho_id` (`carrinho_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`venda_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `carrinhos`
--
ALTER TABLE `carrinhos`
  MODIFY `carrinho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  MODIFY `carrinho_produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `venda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  ADD CONSTRAINT `carrinho_produtos_ibfk_1` FOREIGN KEY (`carrinho_id`) REFERENCES `carrinhos` (`carrinho_id`),
  ADD CONSTRAINT `carrinho_produtos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `cadastro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
