package com.example.aemblog.core.services;

import org.apache.sling.api.resource.Resource;
import org.apache.sling.api.resource.ResourceResolver;
import java.util.List;

public interface CategoryService {
    List<Resource> getCategories(ResourceResolver resourceResolver, String parentPath);
    Resource getCategoryByName(ResourceResolver resourceResolver, String parentPath, String categoryName);
    Resource getCategoryById(ResourceResolver resourceResolver, String categoryFragmentPath); // Path to the category CF
}
