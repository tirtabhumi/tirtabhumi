
import re

file_path = 'resources/views/landing-page.blade.php'

with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Define regex for sections
# Note: This relies on the comments I saw in the file content
hero_pattern = re.compile(r'<!-- Hero Section -->\s*<section.*?>(.*?)</section>', re.DOTALL)
pricing_pattern = re.compile(r'<!-- Pricing Section -->\s*<section.*?>(.*?)</section>', re.DOTALL)

hero_match = hero_pattern.search(content)
pricing_match = pricing_pattern.search(content)

if hero_match and pricing_match:
    hero_full_block = hero_match.group(0) # Includes tags
    pricing_full_block = pricing_match.group(0) # Includes tags
    
    # Remove them from original content to re-insert
    # We replace them with placeholders to preserve order of other things if needed, 
    # but here we want to SWAP.
    
    # Actually, simpler approach:
    # 1. Split content into parts.
    # PRE-HERO
    # HERO
    # PRICING
    # POST-PRICING
    
    # Based on the file view:
    # Hero starts at line 83.
    # Pricing starts at line 126.
    # So they are adjacent.
    
    start_hero = content.find('<!-- Hero Section -->')
    end_hero = content.find('<!-- Pricing Section -->')
    
    start_pricing = end_hero # Pricing starts immediately after Hero? 
    # Let's verify if there is spacing.
    # In file view: 
    # 123:     </section>
    # 124: 
    # 125:     <!-- Pricing Section -->
    
    # So end_hero should include the closing section tag.
    
    # We need to find the specific substring indices.
    
    # Re-reading file to get exact indices
    pass

