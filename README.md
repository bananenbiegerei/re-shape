# Re:shape Theme

## Installation

Follow the steps below to install this project:
1. Clone Repository
2. Install Git Submodul BB Blocks
3. Install Git Submodules of BB Blocks
4. Install Node Modules

### 1. Clone Repository
```bash
git clone https://BananenbiegereiBerlin@bitbucket.org/BananenbiegereiBerlin/bb-blocks.git
```
### 2. Install Node Modules

To install BB Blocks Sumbodules:

```bash
git submodule add https://BananenbiegereiBerlin@bitbucket.org/BananenbiegereiBerlin/bb-blocks.git
```
Optional: 
```bash
git submodule update
```
### 3. Install Git Submodules of BB Blocks
To install sumbodules of BB Block Submodule:
```bash
git submodule update --init --recursive
```
The --recursive option is necessary due to the structure of our submodules:
```bash
- theme repo
  - bb-locks submodule
    - individual submodules like, paragraph, image etc.
```
### 4. Install Node Modules
```bash
npm install
```

# Users Manual
- copy the theme folder to your theme directory
- notwendige plugins installieren
- go to your backend and activate the theme
- Add menus
  - Header
  - Footer
- Options
  - Social Media
  - Contact
- Change Logos
  - Big Logo
  - Small Logo
- Call To Action Buttons
- 
